HiiShe.RegisterStyleSheet("/HiiShe_Style/v1_0/artdialog/skins/default.css");
HiiShe.RegisterJavaScript("/HiiShe_Style/v1_0/artdialog/artDialog.source.js");
HiiShe.RegisterJavaScript("/HiiShe_Style/v1_0/artdialog/iframeTools.source.js");
HiiShe.Core.Dialog = {
    /**
    * 提示对话框
    */
    AlertMessage: function (alertMsg) {
        art.dialog({
            content: alertMsg
        });
    },
    AlertMessageEx: function (alertMsg,_id,CallBack) {
        art.dialog({
            id: _id == null ? '_DialogTemp_ID' : _id,
            content: alertMsg,
            close: function () {
                CallBack();
            }
        });
    },
    NoticeRightBottom: function (_Title, _Content, _width, _height) {
        art.dialog({
            id: 'msg',
            title: _Title == null ? '公告' : _Title,
            content: _Content == null ? '' : _Content,
            width: _width == null ? 320 : _width,
            height: _height == null ? 240 : _height,
            left: '100%',
            top: '100%',
            fixed: true,
            drag: false,
            resize: false
        });
    },
    OpenDialog: function (_url,_title,_id,_width,_height,_isLock,_canResize)
    {
        art.dialog.open(_url, {
            id: _id == null ? 'msg' : _id,
            title: _title == null ? '提示' : _title,
            width: _width == null ? '800px' : _width,
            height: _height == null ? '600px' : _height,
            left: '50%',
            top: '50%',
            background: '#000000',
            opacity: 0.1,
            lock: _isLock == null ? true : _isLock,
            resize: _canResize == null ? false : _canResize,
            close: function () { }
        }, false);
    },

    AutoCloseDialog: function (_Content, _MisTime, _icon, _width, _height) {
        var timer;
        art.dialog({
            width: _width == null ? 320 : _width,
            height: _height == null ? 240 : _height,
            icon: _icon == null ? '' : _icon,
            content: _Content == null ? '' : _Content,
            init: function () {
                var that = this, i = (_MisTime == null ? 5 : _MisTime);
                var fn = function () {
                    that.title(i + '秒');
                    !i && that.close();
                    i--;
                };
                timer = setInterval(fn, 1000);
                fn();
            },
            ok: true,
            cancel: true,
            close: function () {
                clearInterval(timer);
            }
        }).show();
    },
    ConfirmDialog: function (_Content,callBackOK,callBackCancel) {
        var flag;
        art.dialog.confirm(_Content, function () {
            callBackOK();
        }, function () {
            HiiShe.Core.Dialog.Tips("取消操作!");
        });
        return flag;
    },

    Tips: function (_Content) {
        art.dialog.tips(_Content);
    },
    CloseDialog: function () {
        art.dialog.close();
    }
};
