tinymce.PluginManager.add('charactercount', function (editor) {
    var self = this;
    var tc;
    function update() {
        editor.theme.panel.find('#charactercount').text(['Caractères: {0}', self.getCount()]);

        if(tc < minCount){
            editor.theme.panel.find('#charactercount').text(["Caractères: {0}, votre texte doit contenir au moins "+ minCount +" caractères.", self.getCount()]);
            editor.getContentAreaContainer().style.border = '1px solid red';
        } else if(tc > maxCount){
            editor.theme.panel.find('#charactercount').text(["Caractères: {0}, votre texte doit contenir moins de "+ maxCount +" caractères.", self.getCount()]);
            editor.getContentAreaContainer().style.border = '1px solid red';
        } else{
            editor.theme.panel.find('#charactercount').text(['Caractères: {0}', self.getCount()]);
            editor.getContentAreaContainer().style.border = '';
        }
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
        tc = decodedStripped.length;

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
