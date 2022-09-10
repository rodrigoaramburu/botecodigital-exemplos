import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import List from '@editorjs/list';
import CodeTool from '@editorjs/code';
import ImageTool from '@editorjs/image';
import Underline from '@editorjs/underline';
import Table from '@editorjs/table';
import Blockquote from './blockquote/index.js'

const editor = new EditorJS({
    holder: 'editorjs',
    onChange: function(api, event){
        api.saver.save().then((out) => {
            console.log(out);
        })
    },
    data:{"time":1662486052475,"blocks":[{"id":"0q8M-0fdEa","type":"paragraph","data":{"text":"um teste"}}],"version":"2.25.0"},
    tools: {
        header: {
            class: Header,
            inlineToolbar: true
        },
        list:{
            class: List,
            inlineToolbar: true
        },
        code: {
            class: CodeTool
        },
        image: {
            class: ImageTool,
            config: {
                endpoints: {
                    byFile: 'http://localhost:8000/upload-file.php' 
                }
            }
        },
        underline: {
            class: Underline
        },
        table: {
            class: Table,
            inlineToolbar: true,
            config: {
              rows: 2,
              cols: 3,
            },
        },
        blockquote: {
            class: Blockquote,
            inlineToolbar: true
        }
    }
});

const saveButton = document.querySelector('#btn-save');
const output = document.querySelector('#output');

saveButton.addEventListener('click', function(){
    editor.save().then( (out) =>{
        output.value = JSON.stringify(out);
    }).catch((error) => {
        console.log('Falha: ', error)
    });
});
