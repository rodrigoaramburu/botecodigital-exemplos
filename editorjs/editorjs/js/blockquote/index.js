import './index.css';
  
export default class Blockquote {

  constructor({data, config, api, readOnly}){
      this.data = data;
      this.wrapper = undefined;
  }


  static get toolbox() {
      return {
        title: 'Blockquote',
        icon: `<?xml version="1.0" ?><svg width="32" height="32" viewBox="0 0 1792 1792" width="1792" xmlns="http://www.w3.org/2000/svg"><path d="M832 960v384q0 80-56 136t-136 56h-384q-80 0-136-56t-56-136v-704q0-104 40.5-198.5t109.5-163.5 163.5-109.5 198.5-40.5h64q26 0 45 19t19 45v128q0 26-19 45t-45 19h-64q-106 0-181 75t-75 181v32q0 40 28 68t68 28h224q80 0 136 56t56 136zm896 0v384q0 80-56 136t-136 56h-384q-80 0-136-56t-56-136v-704q0-104 40.5-198.5t109.5-163.5 163.5-109.5 198.5-40.5h64q26 0 45 19t19 45v128q0 26-19 45t-45 19h-64q-106 0-181 75t-75 181v32q0 40 28 68t68 28h224q80 0 136 56t56 136z"/></svg>`
      };
  }

  render(){
      this.wrapper = document.createElement('figure');
      this.wrapper.classList.add('blockquote-wrapper');
      
      let blockquote = document.createElement('blockquote');
      blockquote.classList.add('blockquote-blockquote');
      blockquote.contentEditable = true;
      this.wrapper.appendChild(blockquote);
      
      let figcaption = document.createElement('figcaption');
      let cite = document.createElement('cite');
      cite.contentEditable = true;
      cite.classList.add('blockquote-cite');
      figcaption.appendChild(cite)
      this.wrapper.appendChild(figcaption);

      cite.innerHTML= this.data.cite ?? '';
      blockquote.innerHTML = this.data.blockquote ?? '';
              
      return this.wrapper;
  }


  save(blockContent){
      return {
          cite: blockContent.querySelector("cite").innerHTML,
          blockquote:  blockContent.querySelector("blockquote").innerHTML
      }
    }
}