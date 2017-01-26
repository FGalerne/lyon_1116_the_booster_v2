tinymce.PluginManager.add('charactercount', function (editor) {
    var self = this;

    function update() {
        editor.theme.panel.find('#charactercount').text(['Caractères: {0}', self.getCount()]);
    }

    editor.on('init', function () {
        var statusbar = editor.theme.panel && editor.theme.panel.find('#statusbar')[0];

        if (statusbar) {
            window.setTimeout(function () {
                statusbar.insert({
                    type: 'label',
                    name: 'charactercount',
                    text: ['Caractères: {0}', self.getCount()],
                    classes: 'charactercount',
                    disabled: editor.settings.readonly
                }, 0);

                editor.on('setcontent beforeaddundo', update);

                editor.on('keyup', function (e) {
                    update();
                });
            }, 0);
        }
    });
    var maxCount = editor.getParam("maxCount");
    var minCount = editor.getParam("minCount");

    self.getCount = function () {

        var tx = editor.getContent({ format: 'raw' });
        var decoded = decodeHtml(tx);
        var decodedStripped = decoded.replace(/(<([^>]+)>)/ig, "").trim();
        var tc = decodedStripped.length;

        if (tc > maxCount || tc < minCount)
            editor.contentDocument.body.style.borderBottom = '1px solid red';
        else
            editor.contentDocument.body.style.border = '';

        return tc;
    };

    editor.on('submit', function(e) {
        var count = this.plugins["charactercount"].getCount();
        if (count > maxCount || count < minCount){
            e.preventDefault();
        }
    });

    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
});
