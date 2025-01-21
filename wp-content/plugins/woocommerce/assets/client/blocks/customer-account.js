(()=>{var e,t,o,n={2645:(e,t,o)=>{"use strict";o.r(t);var n=o(1609);const c=window.wp.blocks;var r=o(7104),l=o(5573);const a=(0,n.createElement)(l.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,n.createElement)("path",{id:"icon/action/account_circle_24px_2",fillRule:"evenodd",clipRule:"evenodd",fill:"currentColor",d:"M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM7.07 18.28C7.5 17.38 10.12 16.5 12 16.5C13.88 16.5 16.51 17.38 16.93 18.28C15.57 19.36 13.86 20 12 20C10.14 20 8.43 19.36 7.07 18.28ZM12 14.5C13.46 14.5 16.93 15.09 18.36 16.83C19.38 15.49 20 13.82 20 12C20 7.59 16.41 4 12 4C7.59 4 4 7.59 4 12C4 13.82 4.62 15.49 5.64 16.83C7.07 15.09 10.54 14.5 12 14.5ZM12 6C10.06 6 8.5 7.56 8.5 9.5C8.5 11.44 10.06 13 12 13C13.94 13 15.5 11.44 15.5 9.5C15.5 7.56 13.94 6 12 6ZM10.5 9.5C10.5 10.33 11.17 11 12 11C12.83 11 13.5 10.33 13.5 9.5C13.5 8.67 12.83 8 12 8C11.17 8 10.5 8.67 10.5 9.5Z"}));var i=o(7723);const s=JSON.parse('{"name":"woocommerce/customer-account","version":"1.0.0","title":"Customer account","description":"A block that allows your customers to log in and out of their accounts in your store.","category":"woocommerce","keywords":["WooCommerce","My Account"],"supports":{"align":true,"color":{"text":true},"typography":{"fontSize":true,"__experimentalFontFamily":true},"spacing":{"margin":true,"padding":true}},"attributes":{"displayStyle":{"type":"string","default":"icon_and_text"},"iconStyle":{"type":"string","default":"default"},"iconClass":{"type":"string","default":"icon"}},"textdomain":"woocommerce","apiVersion":3,"$schema":"https://schemas.wp.org/trunk/block.json"}');var u=o(851);const m=window.wp.blockEditor,p=window.wp.components,d=(0,n.createElement)(l.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 16 16"},(0,n.createElement)("path",{fillRule:"evenodd",clipRule:"evenodd",d:"M8.00009 8.34785C10.3096 8.34785 12.1819 6.47909 12.1819 4.17393C12.1819 1.86876 10.3096 0 8.00009 0C5.69055 0 3.81824 1.86876 3.81824 4.17393C3.81824 6.47909 5.69055 8.34785 8.00009 8.34785ZM0.333496 15.6522C0.333496 15.8444 0.489412 16 0.681933 16H15.3184C15.5109 16 15.6668 15.8444 15.6668 15.6522V14.9565C15.6668 12.1428 13.7821 9.73911 10.0912 9.73911H5.90931C2.21828 9.73911 0.333645 12.1428 0.333645 14.9565L0.333496 15.6522Z",fill:"currentColor"})),w=(0,n.createElement)(l.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 18 18"},(0,n.createElement)("path",{d:"M9 0C4.03579 0 0 4.03579 0 9C0 13.9642 4.03579 18 9 18C13.9642 18 18 13.9642 18 9C18 4.03579 13.9642 0 9 0ZM9 4.32C10.5347 4.32 11.7664 5.57056 11.7664 7.08638C11.7664 8.62109 10.5158 9.85277 9 9.85277C7.4653 9.85277 6.23362 8.60221 6.23362 7.08638C6.23362 5.57056 7.46526 4.32 9 4.32ZM9 10.7242C11.1221 10.7242 12.96 12.2021 13.7937 14.4189C12.5242 15.5559 10.8379 16.238 9 16.238C7.16207 16.238 5.49474 15.5369 4.20632 14.4189C5.05891 12.2021 6.87793 10.7242 9 10.7242Z",fill:"currentColor"})),_=(0,n.createElement)(l.SVG,{viewBox:"5 5 22 22",fill:"none",xmlns:"http://www.w3.org/2000/svg"},(0,n.createElement)(l.Circle,{cx:"16",cy:"10.5",r:"3.5",stroke:"currentColor",strokeWidth:"2"}),(0,n.createElement)(l.Path,{fillRule:"evenodd",clipRule:"evenodd",d:"M11.5 18.5H20.5C21.8807 18.5 23 19.6193 23 21V25.5H25V21C25 18.5147 22.9853 16.5 20.5 16.5H11.5C9.01472 16.5 7 18.5147 7 21V25.5H9V21C9 19.6193 10.1193 18.5 11.5 18.5Z",fill:"currentColor"})),C=window.wc.wcSettings;let y=function(e){return e.ICON_AND_TEXT="icon_and_text",e.TEXT_ONLY="text_only",e.ICON_ONLY="icon_only",e}({}),b=function(e){return e.DEFAULT="default",e.ALT="alt",e.LINE="line",e}({});const g={default:d,alt:w,line:_},f=({iconStyle:e,displayStyle:t,iconClass:o})=>t===y.TEXT_ONLY?null:(0,n.createElement)(r.A,{className:o,icon:g[e],size:18}),v=({displayStyle:e})=>{if(e===y.ICON_ONLY)return null;const t=(0,C.getSetting)("currentUserId",null);return(0,n.createElement)("span",{className:"label"},t?(0,i.__)("My Account","woocommerce"):(0,i.__)("Log in","woocommerce"))},E=({attributes:e})=>{const{displayStyle:t,iconStyle:o,iconClass:c}=e,r=t===y.ICON_ONLY?{"aria-label":(0,i.__)("My Account","woocommerce")}:{};return(0,n.createElement)("a",{href:(0,C.getSetting)("dashboardUrl",(0,C.getSetting)("wpLoginUrl","/wp-login.php")),...r},(0,n.createElement)(f,{iconStyle:o,displayStyle:t,iconClass:c}),(0,n.createElement)(v,{displayStyle:t}))};var h=o(6087);const O=()=>{const e=`${(0,C.getSetting)("adminUrl")}admin.php?page=wc-settings&tab=account`,t=(0,h.createInterpolateElement)(`<a>${(0,i.__)("Manage account settings","woocommerce")}</a>`,{a:(0,n.createElement)(p.ExternalLink,{href:e})});return(0,n.createElement)("div",{className:"wc-block-editor-customer-account__link"},t)},k=({attributes:e,setAttributes:t})=>{const{displayStyle:o,iconStyle:c}=e,l=[y.ICON_ONLY,y.ICON_AND_TEXT].includes(o);return(0,n.createElement)(m.InspectorControls,{key:"inspector"},(0,n.createElement)(p.PanelBody,null,(0,n.createElement)(O,null)),(0,n.createElement)(p.PanelBody,{title:(0,i.__)("Display settings","woocommerce")},(0,n.createElement)(p.SelectControl,{className:"customer-account-display-style",label:(0,i.__)("Icon options","woocommerce"),value:o,onChange:e=>{t({displayStyle:e})},help:(0,i.__)("Choose if you want to include an icon with the customer account link.","woocommerce"),options:[{value:y.ICON_AND_TEXT,label:(0,i.__)("Icon and text","woocommerce")},{value:y.TEXT_ONLY,label:(0,i.__)("Text-only","woocommerce")},{value:y.ICON_ONLY,label:(0,i.__)("Icon-only","woocommerce")}]}),l?(0,n.createElement)(p.__experimentalToggleGroupControl,{label:(0,i.__)("Display Style","woocommerce"),isBlock:!0,value:c,onChange:e=>t({iconStyle:e}),className:"wc-block-editor-customer-account__icon-style-toggle"},(0,n.createElement)(p.__experimentalToggleGroupControlOption,{value:b.LINE,label:(0,n.createElement)(r.A,{icon:_,size:16,className:(0,u.A)("wc-block-editor-customer-account__icon-option",{active:c===b.LINE})})}),(0,n.createElement)(p.__experimentalToggleGroupControlOption,{value:b.DEFAULT,label:(0,n.createElement)(r.A,{icon:d,size:16,className:(0,u.A)("wc-block-editor-customer-account__icon-option",{active:c===b.DEFAULT})})}),(0,n.createElement)(p.__experimentalToggleGroupControlOption,{value:b.ALT,label:(0,n.createElement)(r.A,{icon:w,size:20,className:(0,u.A)("wc-block-editor-customer-account__icon-option",{active:c===b.ALT})})})):null))};o(677);o(4788),(0,c.registerBlockType)(s,{icon:{src:(0,n.createElement)(r.A,{icon:a,className:"wc-block-editor-components-block-icon"})},attributes:{...s.attributes},edit:({attributes:e,setAttributes:t})=>{const{className:o}=e,c=(0,m.useBlockProps)({className:(0,u.A)("wc-block-editor-customer-account",o)});return(0,n.createElement)(n.Fragment,null,(0,n.createElement)("div",{...c},(0,n.createElement)(m.InspectorControls,null,(0,n.createElement)(k,{attributes:e,setAttributes:t})),(0,n.createElement)(p.Disabled,null,(0,n.createElement)(E,{attributes:e}))))},save:()=>null}),(0,c.registerBlockVariation)("woocommerce/customer-account",{name:"woocommerce/customer-account",title:(0,i.__)("Customer account","woocommerce"),isDefault:!0,attributes:{...s.attributes,displayStyle:"icon_and_text",iconStyle:"default",iconClass:"wc-block-customer-account__account-icon"}})},677:()=>{},4788:()=>{},1609:e=>{"use strict";e.exports=window.React},6087:e=>{"use strict";e.exports=window.wp.element},7723:e=>{"use strict";e.exports=window.wp.i18n},5573:e=>{"use strict";e.exports=window.wp.primitives}},c={};function r(e){var t=c[e];if(void 0!==t)return t.exports;var o=c[e]={exports:{}};return n[e].call(o.exports,o,o.exports,r),o.exports}r.m=n,e=[],r.O=(t,o,n,c)=>{if(!o){var l=1/0;for(u=0;u<e.length;u++){for(var[o,n,c]=e[u],a=!0,i=0;i<o.length;i++)(!1&c||l>=c)&&Object.keys(r.O).every((e=>r.O[e](o[i])))?o.splice(i--,1):(a=!1,c<l&&(l=c));if(a){e.splice(u--,1);var s=n();void 0!==s&&(t=s)}}return t}c=c||0;for(var u=e.length;u>0&&e[u-1][2]>c;u--)e[u]=e[u-1];e[u]=[o,n,c]},r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},o=Object.getPrototypeOf?e=>Object.getPrototypeOf(e):e=>e.__proto__,r.t=function(e,n){if(1&n&&(e=this(e)),8&n)return e;if("object"==typeof e&&e){if(4&n&&e.__esModule)return e;if(16&n&&"function"==typeof e.then)return e}var c=Object.create(null);r.r(c);var l={};t=t||[null,o({}),o([]),o(o)];for(var a=2&n&&e;"object"==typeof a&&!~t.indexOf(a);a=o(a))Object.getOwnPropertyNames(a).forEach((t=>l[t]=()=>e[t]));return l.default=()=>e,r.d(c,l),c},r.d=(e,t)=>{for(var o in t)r.o(t,o)&&!r.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.j=4473,(()=>{var e={4473:0};r.O.j=t=>0===e[t];var t=(t,o)=>{var n,c,[l,a,i]=o,s=0;if(l.some((t=>0!==e[t]))){for(n in a)r.o(a,n)&&(r.m[n]=a[n]);if(i)var u=i(r)}for(t&&t(o);s<l.length;s++)c=l[s],r.o(e,c)&&e[c]&&e[c][0](),e[c]=0;return r.O(u)},o=self.webpackChunkwebpackWcBlocksMainJsonp=self.webpackChunkwebpackWcBlocksMainJsonp||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))})();var l=r.O(void 0,[94],(()=>r(2645)));l=r.O(l),((this.wc=this.wc||{}).blocks=this.wc.blocks||{})["customer-account"]=l})();