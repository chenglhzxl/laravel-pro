/**
 * Created by zhuxiaoliang on 2017/7/15.
 */

$.ajaxSetup({//ajax表单提交TOKEN
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function go_lastPage() {
    layer.confirm('您在次页面的操作没有保存，确定返回吗？',{btn:['确定','取消']},function () {
        history.go(-1);
    })
}


function article_delete(id) {
    layer.confirm('你确定要删除该文章吗？', {icon: 3, title: '提示'}, function (index) {
        $.ajax({
            type: 'post',
            url: '/article/delete/' + id,
            success: function (res) {
                if (res.status) {
                    layer.msg(res.msg, {time: 1000}, function () {
                        location.reload()
                    })
                } else {
                    alert(res.msg)
                }
            }
        })
    })
}

function submitArticle(articleid) {
    var title = $("#title").val(), abstract = $("#abstract").val(), content = $("#content").val();
    if (title && abstract && content) {
        var data = {
            'title': title,
            'abstract': abstract,
            'content': content,
            'creatTime': $("#creatTime").val(),
        };
        if (articleid!="''") {
            $.ajax({
                type: 'post',
                data: data,
                url: '/article/edit/' + articleid,
                success: function (res) {
                    if (res.status) {
                        layer.msg(res.msg, {time: 1000}, function () {
                            location.href = '/article';
                        })
                    } else {
                        alert(res.msg)
                    }
                }
            })
        } else {
            $.ajax({
                type: 'post',
                data: data,
                url: '/article/add',
                success: function (res) {
                    if (res.status) {
                        layer.msg(res.msg, {time: 1000}, function () {
                            location.href = '/article';
                        })
                    } else {
                        alert(res.msg)
                    }
                }
            })
        }
    } else {
        layer.msg('请填写完整内容！')
        return false;
    }
}
