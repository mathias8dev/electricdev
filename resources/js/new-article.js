const EditorJS = require('@editorjs/editorjs')
const Header = require('@editorjs/header')
const List = require('@editorjs/')
const RawTool = require('@editorjs/raw')
const LinkTool = require('@editorjs/link')
const ImageTool = require('@editorjs/image')
const Embed = require('@editorjs/embed')


const editor = new EditorJS({
    holder: 'editorJS',
    tools: {
        header: {
            class: Header,
            inlineToolbar: ['link']
        },
        list: {
            class: List,
            inlineToolbar: true
        },
        raw: RawTool,
        linkTool: {
            class: LinkTool,
            config: {
                endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching,
            }
        },
        image: {
            class: ImageTool,
            config: {
                endpoints: {
                    byFile: 'http://localhost:8008/uploadFile', // Your backend file uploader endpoint
                    byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
                }
            }
        },
        embed: {
            class: Embed,
            inlineToolbar: true,
            config: {
                services: {
                    youtube: true,
                    coub: true
                }
            }
        },

    }

})

