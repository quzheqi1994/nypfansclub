// 完善获取音乐信息
// 音乐所在列表ID、音乐对应ID、回调函数
function ajaxUrl(music, callback)
{
    // 已经有数据，直接回调
    if(music.url !== null && music.url !== "err" && music.url !== "") {
        callback(music);
        return true;
    }
    // id为空，赋值链接错误。直接回调
    if(music.id === null) {
        music.url = "err";
        updateMinfo(music); // 更新音乐信息
        callback(music);
        return true;
    }
    
    $.ajax({ 
        type: mkPlayer.method, 
        url: mkPlayer.api,
        data: "types=url&id=" + music.id + "&source=" + music.source,
        dataType : "jsonp",
        success: function(jsonData){
            // 调试信息输出
            if(mkPlayer.debug) {
                console.debug("歌曲链接：" + jsonData.url);
            }
            
            // 解决网易云音乐部分歌曲无法播放问题
            if(music.source == "netease") {
                if(jsonData.url === "") {
                    jsonData.url = "https://music.163.com/song/media/outer/url?id=" + music.id + ".mp3";
                } else {
                    jsonData.url = jsonData.url.replace(/m7c.music./g, "m7.music.");
                    jsonData.url = jsonData.url.replace(/m8c.music./g, "m8.music.");
                }
            } else if(music.source == "baidu") {    // 解决百度音乐防盗链
                jsonData.url = jsonData.url.replace(/http:\/\/zhangmenshiting.qianqian.com/g, "https://gss0.bdstatic.com/y0s1hSulBw92lNKgpU_Z2jR7b2w6buu");
            }
            
            if(jsonData.url === "") {
                music.url = "err";
            } else {
                music.url = jsonData.url;    // 记录结果
            }
            
            updateMinfo(music); // 更新音乐信息
            
            callback(music);    // 回调函数
            return true;
        },   //success
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            layer.msg('歌曲链接获取失败 - ' + XMLHttpRequest.status);
            console.error(XMLHttpRequest + textStatus + errorThrown);
        }   // error 
    }); //ajax
    
}

// 完善获取音乐封面图
// 包含音乐信息的数组、回调函数
function ajaxPic(music, callback)
{
    // 已经有数据，直接回调
    if(music.pic !== null && music.pic !== "err" && music.pic !== "") {
        callback(music);
        return true;
    }
    // pic_id 为空，赋值链接错误。直接回调
    if(music.pic_id === null) {
        music.pic = "err";
        updateMinfo(music); // 更新音乐信息
        callback(music);
        return true;
    }
    
    $.ajax({ 
        type: mkPlayer.method, 
        url: mkPlayer.api,
        data: "types=alpicurl&id=" + music.pic_id + "&source=" + music.source,
        dataType : "jsonp",
        success: function(jsonData){
            // 调试信息输出
            if(mkPlayer.debug) {
                console.log("歌曲封面：" + jsonData.url);
            }
            
            if(jsonData.url !== "") {
                music.pic = jsonData.url;    // 记录结果
            } else {
                music.pic = "err";
            }
            
            updateMinfo(music); // 更新音乐信息
            
            callback(music);    // 回调函数
            return true;
        },   //success
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            layer.msg('歌曲封面获取失败 - ' + XMLHttpRequest.status);
            console.error(XMLHttpRequest + textStatus + errorThrown);
        }   // error 
    }); //ajax
    
}

// ajax加载用户歌单
// 参数：歌单网易云 id, 歌单存储 id，回调函数
function ajaxPlayList(lid, id, callback) {
    if(!lid) return false;
    
    // 已经在加载了，跳过
    if(musicList[id].isloading === true) {
        return true;
    }
    
    musicList[id].isloading = true; // 更新状态：列表加载中
    
    $.ajax({
        type: mkPlayer.method, 
        url: mkPlayer.api, 
        data: "types=playlist&id=" + lid,
        dataType : "jsonp",
        complete: function(XMLHttpRequest, textStatus) {
            musicList[id].isloading = false;    // 列表已经加载完了
        },  // complete
        success: function(jsonData){
            // 存储歌单信息
            var tempList = {
                id: lid,    // 列表的网易云 id
                name: jsonData.playlist.name,   // 列表名字
                cover: jsonData.playlist.coverImgUrl,   // 列表封面
                creatorName: jsonData.playlist.crnickname,   // 列表创建者名字
                creatorAvatar: jsonData.playlist.cravatarUrl,   // 列表创建者头像
                item: []
            };
            
            if(jsonData.playlist.coverImgUrl !== '') {
                tempList.cover = jsonData.playlist.coverImgUrl + "?param=200y200";
            } else {
                tempList.cover = musicList[id].cover;
            }
            
            if(typeof jsonData.playlist.tracks !== undefined || jsonData.playlist.tracks.length !== 0) {
                // 存储歌单中的音乐信息
                for (var i = 0; i < jsonData.playlist.tracks.length; i++) {
                    tempList.item[i] =  {
                        id: jsonData.playlist.tracks[i].id,  // 音乐ID
                        name: jsonData.playlist.tracks[i].name,  // 音乐名字
                        artist: jsonData.playlist.tracks[i].arname, // 艺术家名字
                        album: jsonData.playlist.tracks[i].alname,    // 专辑名字
                        source: "netease",     // 音乐来源
                        url_id: jsonData.playlist.tracks[i].id,  // 链接ID
                        pic_id: null,  // 封面ID
                        lyric_id: jsonData.playlist.tracks[i].id,  // 歌词ID
                        pic: jsonData.playlist.tracks[i].alpicurl,    // 专辑图片
                        url: null   // mp3链接
                    };
                }
            }
            /*
			playlist:
				name 列表名字
				coverImgUrl 列表封面
				crnickname 列表创建者名字
				cravatarUrl 列表创建者头像
				tracks[i]
					id 音乐ID
					name 音乐名字
					arname 专辑名字
					alname 艺术家名字
					alpicurl 专辑图片
            */
            // 歌单用户 id 不能丢
            if(musicList[id].creatorID) {
                tempList.creatorID = musicList[id].creatorID;
                if(musicList[id].creatorID === rem.uid) {   // 是当前登录用户的歌单，要保存到缓存中
                    var tmpUlist = playerReaddata('ulist');    // 读取本地记录的用户歌单
                    if(tmpUlist) {  // 读取到了
                        for(i=0; i<tmpUlist.length; i++) {  // 匹配歌单
                            if(tmpUlist[i].id == lid) {
                                tmpUlist[i] = tempList; // 保存歌单中的歌曲
                                playerSavedata('ulist', tmpUlist);  // 保存
                                break;
                            }
                        }
                    }
                }
            }
            
            // 存储列表信息
            musicList[id] = tempList;
            
            // 首页显示默认列表
            if(id == mkPlayer.defaultlist) loadList(id);
            if(callback) callback(id);    // 调用回调函数
            
            // 改变前端列表
            $(".sheet-item[data-no='" + id + "'] .sheet-cover").attr('src', tempList.cover);    // 专辑封面
            $(".sheet-item[data-no='" + id + "'] .sheet-name").html(tempList.name);     // 专辑名字
            
            // 调试信息输出
            if(mkPlayer.debug) {
                console.debug("歌单 [" +tempList.name+ "] 中的音乐获取成功");
            }
        },   //success
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.error(XMLHttpRequest + textStatus + errorThrown);
            $(".sheet-item[data-no='" + id + "'] .sheet-name").html('<span style="color: #EA8383">读取失败</span>');     // 专辑名字
        }   // error  
    });//ajax
}

// ajax加载歌词
// 参数：音乐ID，回调函数
function ajaxLyric(music, callback) {
    lyricTip('歌词加载中...');
    
    if(!music.lyric_id) callback('');  // 没有歌词ID，直接返回
    
    $.ajax({
        type: mkPlayer.method,
        url: mkPlayer.api,
        data: "types=lyric&id=" + music.lyric_id + "&source=" + music.source,
        dataType : "jsonp",
        success: function(jsonData){
            // 调试信息输出
            if (mkPlayer.debug) {
                console.debug("歌词获取成功");
            }
            
            if (jsonData.lyric) {
                callback(jsonData.lyric, music.lyric_id);    // 回调函数
            } else {
                callback('', music.lyric_id);    // 回调函数
            }
        },   //success
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            layer.msg('歌词读取失败 - ' + XMLHttpRequest.status);
            console.error(XMLHttpRequest + textStatus + errorThrown);
            callback('', music.lyric_id);    // 回调函数
        }   // error   
    });//ajax
}
