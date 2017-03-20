export class Editor {

    constructor(element) {
        this.defineEditorOn(element)
    }

    /**
     * define new tinymce editor options
     * @param  {[type]} element [description]
     * @return [type]           [description]
     */
    defineEditorOn(element) {
        tinymce.init({
            selector: element,
            min_height: 500
        });
    }

}
