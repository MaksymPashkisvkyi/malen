import{u as _,v as u}from"./index.a87126ce.js";import{n as l}from"./numbers.9fc174f3.js";import{j as m}from"./helpers.53868b98.js";import{q as k}from"./vue3-apexcharts.57b6886c.js";import{b}from"./Caret.d9cc70ba.js";import{a as v}from"./Tooltip.73441134.js";import{_ as x}from"./_plugin-vue_export-helper.eefbdd86.js";import{o as h,c as y,v as c,C as f,G as M,k as g,b as p,l as D,a as S}from"./runtime-dom.esm-bundler.5c3c7d72.js";const C={};function A(t,r){return h(),y("div")}const P=x(C,[["render",A]]),T=""+window.__aioseoDynamicImportPreload__("svg/google.826e7131.svg"),I=""+window.__aioseoDynamicImportPreload__("svg/wordpress.8166fa94.svg"),L=""+window.__aioseoDynamicImportPreload__("svg/aioseo.da6097fa.svg"),E={setup(){return{rootStore:_()}},components:{apexchart:k,CoreLoader:b,CorePopper:v,GraphTimelineMarkers:P},props:{series:{type:Array,required:!0},chartOverrides:{type:Object,default:()=>({})},height:{type:Number,default(){return 350}},legendStyle:{type:String,default(){return"custom"}},loading:{type:Boolean,default:!1},timelineMarkers:{type:Object,default:()=>({})},multiAxis:Boolean,preset:String,invertYAxis:Boolean},data(){return{isMounted:!1,reversedYAxis:!1,colors:["#005AE0","#00AA63","#F18200","#DF2A4A","#8B5CF6","#D946EF"],presets:{overview:{chart:{type:"area",sparkline:{enabled:!0}},grid:{show:!1,padding:{top:2,right:2,bottom:0,left:2}},xaxis:{show:!1},yaxis:{show:!1,labels:{show:!1,formatter:t=>t?l.compactNumber(t):0}}},keywordsDistribution:{chart:{type:"bar",zoom:{enabled:!1},toolbar:{show:!1}},fill:{type:"solid"},stroke:{width:0},xaxis:{type:"category"},yaxis:{forceNiceScale:!1,tickAmount:2,max:100,labels:{formatter:t=>t.toFixed(0)+"%"}},tooltip:{}}},timelineMarkersDate:null}},computed:{getSeries(){const t=this.series;if(!this.invertYAxis||!t.length)return t;const r=t[0].data.map(a=>a.y),e=[];let s=r.map((a,n)=>({value:a,index:n})).sort((a,n)=>a.value-n.value);const o=a=>(e[a[0].index]=a[a.length-1].value,e[a[a.length-1].index]=a[0].value,a=a.slice(1,a.length-1),a);for(;s.length;)s=o(s);return t[0].data=t[0].data.map((a,n)=>({...a,y:e[n],label:a.y})),t},chartDefaults(){const t=this.series;return{colors:this.colors,chart:{type:"area",zoom:{enabled:!1},toolbar:{show:!1},animations:{enabled:!0,easing:"easeout",speed:600,animateGradually:{enabled:!0,delay:50}},parentHeightOffset:0},fill:{type:"gradient",gradient:{shadeIntensity:1,opacityFrom:.4,opacityTo:.9,stops:[0,100]}},dataLabels:{enabled:!1},stroke:{curve:"smooth",width:2},title:{show:!1},grid:{show:!0,strokeDashArray:0,borderColor:"#D0D1D7",yaxis:{lines:{show:!0}},xaxis:{lines:{show:!1}},padding:{top:20,right:20,bottom:20,left:20}},xaxis:{type:"datetime",labels:{show:!0,minHeight:35,trim:!1,rotateAlways:!1,offsetY:6,datetimeFormatter:{year:"yyyy",month:"MMM 'yy",day:"d MMM",hour:""}},tooltip:{enabled:!1,x:{formatter:(r,e)=>{var s,o;const i=new Date(`${(o=(s=t[e.seriesIndex])==null?void 0:s.data[e.dataPointIndex])==null?void 0:o.x} 00:00:00`);return u(i,this.rootStore.aioseo.data.dateFormat)}}},axisBorder:{show:!0,color:"#D0D1D7",height:1,width:"100%",offsetX:0,offsetY:0},axisTicks:{show:!0,borderType:"solid",color:"#E8E8EB",height:12,offsetX:0,offsetY:0}},yaxis:[{labels:{show:!0,formatter:(r,e,i)=>{var o;if(!this.invertYAxis||!(i!=null&&i.config))return r?l.compactNumber(r):0;const s=[...(o=i==null?void 0:i.globals)==null?void 0:o.yAxisScale[0].result].reverse();return s[e]&&(r=s[e]),r?l.compactNumber(r):0}}}],tooltip:{enabled:!0,x:{formatter:(r,e)=>{var s,o;const i=new Date(`${(o=(s=t[e.seriesIndex])==null?void 0:s.data[e.dataPointIndex])==null?void 0:o.x} 00:00:00`);return u(i,this.rootStore.aioseo.data.dateFormat)}},y:{formatter:(r,e)=>{var i,s,o;return this.invertYAxis&&((i=t[e.seriesIndex])!=null&&i.data[e.dataPointIndex].label)?(s=t[e.seriesIndex])==null?void 0:s.data[e.dataPointIndex].label:l.compactNumber((o=t[e.seriesIndex])==null?void 0:o.data[e.dataPointIndex].y)}}},legend:{show:!0,showForSingleSeries:!1,showForNullSeries:!0,showForZeroSeries:!0,position:"bottom",horizontalAlign:"center",floating:!1,fontSize:"14px",fontWeight:400,formatter:(r,e)=>{var o,a,n,d;const i=((a=(o=t[e.seriesIndex])==null?void 0:o.legend)==null?void 0:a.name)||r;if(this.legendStyle==="simple")return[i];let s=((d=(n=t[e.seriesIndex])==null?void 0:n.legend)==null?void 0:d.total)||"";return isNaN(s)||(s=l.compactNumber(s)),[`<strong>${s}</strong>`,i]},inverseOrder:!1,width:void 0,height:void 0,tooltipHoverFormatter:void 0,customLegendItems:[],offsetX:0,offsetY:0,markers:{width:16,height:16,strokeWidth:0,strokeColor:"#fff",fillColors:void 0,radius:16,customHTML:()=>this.legendStyle==="simple"?"":'<span class="marker-checkbox"><svg viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.8542 1.37147C11.44 0.785682 12.3897 0.785682 12.9755 1.37147C13.5613 1.95726 13.5613 2.907 12.9755 3.49279L6.04448 10.4238C5.74864 10.7196 5.35996 10.8661 4.97222 10.8631C4.58548 10.8653 4.19805 10.7189 3.90298 10.4238L1.0243 7.5451C0.438514 6.95931 0.438514 6.00956 1.0243 5.42378C1.61009 4.83799 2.55983 4.83799 3.14562 5.42378L4.97374 7.2519L10.8542 1.37147Z" fill="currentColor" /></svg></span>',onClick:void 0,offsetX:0,offsetY:0},itemMargin:{horizontal:0,vertical:0},onItemClick:{toggleDataSeries:!0},onItemHover:{highlightDataSeries:!0}},annotations:{points:this.annotationsPoints}}},multiAxisDefaults(){const t=this.series,r={yaxis:[]};return t.forEach((e,i)=>{r.yaxis.push({title:{text:e.name.replace("Search ","")},seriesName:e.name,opposite:i===1,labels:{show:!0,formatter:s=>s?l.compactNumber(s):0}})}),r},annotationsPoints(){const t=[];return this.timelineMarkers&&Object.keys(this.timelineMarkers).forEach(r=>{const e={x:new Date(r).getTime(),y:0,yAxisIndex:0,seriesIndex:0,mouseEnter:(s,o)=>{let a=o.target;o.relatedTarget.tagName.toLowerCase()==="circle"&&(a=o.relatedTarget),this.timelineMarkersDate=r,this.showTimelineMarkersTooltip(a)},mouseLeave:(s,o)=>{o.toElement.className==="string"&&o.toElement.className.includes("popper")||this.$refs.timelineMarkersPopper.doClose()},label:{text:this.timelineMarkers[r].length,borderWidth:0,offsetY:23,style:{background:"transparent",color:"#141B38",fontSize:"12px",fontWeight:700}},marker:{size:12,strokeWidth:1,strokeColor:"#D0D1D7",cssClass:"marker-circle"},image:{width:17,height:17}},i=this.timelineMarkers[r].map(s=>s.type);if(i.length===1)switch(e.label={},i[0]){case"aioseoRevision":e.image.path=m(L);break;case"googleUpdate":e.image.path=m(T);break;case"wpRevision":e.image.path=m(I);break}t.push(e)}),t},chartPreset(){return this.preset&&this.presets[this.preset]?this.presets[this.preset]:{}},chartOptions(){let t={...this.chartDefaults,...this.chartPreset,...this.chartOverrides};return this.multiAxis&&(t={...t,...this.multiAxisDefaults}),t},chartClasses(){const t=this.series.length;let r=4;return 4<t&&(r=3),[this.loading?"blurred":"",this.preset?this.preset:"",`legend-${this.legendStyle}`,`legend-columns-${r}`].filter(e=>e).map(e=>"aioseo-graph-"+e)}},methods:{handleTimelineMarkersTooltip(t){var r,e;(r=t.referenceElm)==null||r.classList.remove("active-point"),t.showPopper&&((e=t.referenceElm)==null||e.classList.add("active-point"))},handleTimelineMarkersTooltipUpdate(t){const r=this.$refs.timelineMarkersPopper;r.updatePopper(),t.modal?r.doClose():r.doShow(),this.handleTimelineMarkersTooltip(r)},showTimelineMarkersTooltip(t){var e;const r=this.$refs.timelineMarkersPopper;(e=r.referenceElm)==null||e.classList.remove("active-point"),t==null||t.classList.add("active-point"),r.destroyPopper(),r.doDestroy(),r.referenceElm=t,r.createPopper(),r.doShow()}},mounted(){this.isMounted=!0},beforeUnmount(){this.isMounted=!1}},F={key:0,class:"aioseo-graph"},N={class:"popper"};function B(t,r,e,i,s,o){const a=c("apexchart"),n=c("core-loader"),d=c("graph-timeline-markers"),w=c("core-popper");return s.isMounted?(h(),y("div",F,[f(a,{width:"100%",height:e.height,ref:"apexchart",options:o.chartOptions,series:o.getSeries,class:M(o.chartClasses)},null,8,["height","options","series","class"]),e.loading?(h(),g(n,{key:0,dark:""})):p("",!0),f(w,{ref:"timelineMarkersPopper",options:{placement:"top"},onShow:o.handleTimelineMarkersTooltip,onHide:o.handleTimelineMarkersTooltip},{default:D(()=>[S("span",N,[s.timelineMarkersDate?(h(),g(d,{key:0,date:s.timelineMarkersDate,timelineMarkers:e.timelineMarkers,onUpdate:o.handleTimelineMarkersTooltipUpdate},null,8,["date","timelineMarkers","onUpdate"])):p("",!0)])]),_:1},8,["onShow","onHide"])])):p("",!0)}const V=x(E,[["render",B]]);export{V as G};
