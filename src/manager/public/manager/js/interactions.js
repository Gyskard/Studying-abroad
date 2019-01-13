//--------------------

let content, quill, url, text, editor, iframe, beginIndice, endIndice, lengthURL;

//--------------------

quill = new Quill('#editor', {
    modules: {
        syntax: true,
        toolbar: '#toolbar'
    },
    theme: 'snow'
});

//--------------------

editor = document.querySelector(".ql-editor");
iframe = ['<iframe width="560" height="315" src="', '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'];
image = ['<img src="', '"></a>'];

//--------------------


class saveHtmlText {
    constructor(content) {
        this.content = content
    }
    get() {
        return this.content
    }
    set(content) {
        this.content = content
    }
    detectYT() {
        return this.content.includes("<iframe") && this.content.includes("</iframe")
    }
    detectImg() {
        return this.content.includes("<img src=")
    }
    indexBeginTagYT() {
        return this.content.indexOf("<iframe")
    }
    indexEndTagYT() {
        return this.content.indexOf("</iframe")
    }
    indexBeginTagImg() {
        return this.content.indexOf("<img src=")
    }
    indexEndTagImg(index) {
        return this.content.indexOf(">", index)
    }
    transformTagYT() {
        /*
        beginIndice = saveContent.indexBeginTagYT();
        endIndice = saveContent.indexEndTagYT();
        lengthURL = endIndice - beginIndice;
        text = saveContent.get().trim();
        url = text.substr(beginIndice + 38, lengthURL - 152);
        saveContent.set(text.substr(0, beginIndice) + "[YT]" + url + "[/YT]" + text.substr(endIndice + 9, text.length - endIndice));
         */
        this.content = saveContent.get().trim().substr(0, saveContent.indexBeginTagYT()) + "[YT]" + saveContent.get().trim().substr(saveContent.indexBeginTagYT() + 38, saveContent.indexEndTagYT() - saveContent.indexBeginTagYT() - 152) + "[/YT]" + saveContent.get().trim().substr(saveContent.indexEndTagYT() + 9, saveContent.get().trim().length - saveContent.indexEndTagYT());
    }
    transformTagImg() {
        /*
        beginIndice = saveContent.indexBeginTagImg();
        endIndice = saveContent.indexEndTagImg();
        lengthURL = endIndice - beginIndice;
        text = saveContent.get().trim();
        url = text.substr(beginIndice + 9, lengthURL - 11);
        console.log(url);
        this.content.set(text.substr(0, beginIndice) + "[img]" + url + "[/img]" + text.substr(endIndice + 4, text.length - endIndice));
        */
        //this.content = saveContent.get().trim().substr(0, saveContent.indexBeginTagImg()) + "[img]" + saveContent.get().trim().substr(saveContent.indexBeginTagImg() + 8, saveContent.indexEndTagImg() - saveContent.indexBeginTagImg() - 10) + "[/img]" + saveContent.get().trim().substr(saveContent.indexEndTagImg() + 4, saveContent.get().trim().length - saveContent.indexEndTagImg());
        beginIndice = saveContent.indexBeginTagImg();
        endIndice = saveContent.indexEndTagImg(beginIndice);
        lengthURL = endIndice - beginIndice;
        text = saveContent.get().trim();
        url = text.substr(beginIndice + 10, lengthURL - 11);
        saveContent.set(text.substr(0, beginIndice) + "[img]" + url + "[/img]" + text.substr(endIndice + 1, text.length - endIndice));
    }
}

saveContent = new saveHtmlText($('#oldText')[0].textContent.trim());

console.log(saveContent.get());
console.log(saveContent.detectImg());

while(saveContent.detectYT()) {
    saveContent.transformTagYT()
}

if(saveContent.detectImg()) {
    saveContent.transformTagImg()
}

console.log(saveContent.get());

$('.ql-editor').html(saveContent.get());

//--------------------

class htmlText {
    constructor(content) {
        this.content = content
    }
    get() {
        return this.content
    }
    set(content) {
        this.content = content
    }
    detectYouTube() {
        return this.content.includes("[YT]") && this.content.includes("[/YT]")
    }
    detectImg() {
        return this.content.includes("[img]") && this.content.includes("[/img]")
    }
    indexBeginTagYT() {
        return this.content.indexOf("[YT]")
    }
    indexEndTagYT() {
        return this.content.indexOf("[/YT]")
    }
    indexBeginTagImg() {
        return this.content.indexOf("[img]")
    }
    indexEndTagImg() {
        return this.content.indexOf("[/img]")
    }
    transformTagYT() {
        /*
        beginIndice = content.indexBeginTagYT();
        endIndice = content.indexEndTagYT();
        lengthURL = endIndice - beginIndice;
        text = content.get();
        url = text.substr(beginIndice + 4, lengthURL - 4);
        content.set(text.substr(0, beginIndice) + iframe[0] + url + iframe[1] + text.substr(endIndice + 5, text.length - endIndice))
        */
        this.content = content.get().substr(0, content.indexBeginTagYT()) + iframe[0] + content.get().substr(content.indexBeginTagYT() + 4, content.indexEndTagYT() - content.indexBeginTagYT() - 4) + iframe[1] + content.get().substr(content.indexEndTagYT() + 5, content.get().length - content.indexEndTagYT())
    }
    transformTagImg() {
        /*
        beginIndice = content.indexBeginTagImg();
        endIndice = content.indexEndTagImg();
        lengthURL = endIndice - beginIndice;
        text = content.get();
        url = text.substr(beginIndice + 5, lengthURL - 5);
        content.set(text.substr(0, beginIndice) + image[0] + url + image[1] + text.substr(endIndice + 6, text.length - endIndice))
        */
        this.content = content.get().substr(0, content.indexBeginTagImg()) + image[0] + content.get().substr(content.indexBeginTagImg() + 5, content.indexEndTagImg() - content.indexBeginTagImg() - 5) + image[1] + content.get().substr(content.indexEndTagImg() + 6, content.get().length - content.indexEndTagImg())
    }
}

content = new htmlText(editor.innerHTML);

//--------------------

quill.on('text-change', function(delta, oldDelta, source) {
    if (source === 'user') {
        content.set(editor.innerHTML);
        while (content.detectYouTube()) {
            content.transformTagYT()
        }
        while (content.detectImg()) {
            console.log("test");
            content.transformTagImg()
        }
        $('#html').val(content.get())
    }
});

//--------------------