import{I as x,c as o,a as l,b as i,t as c,m,p as b,o as s,i as d,g as f,u as g,y as p,n as y}from"./app-BrDR_cqU.js";const _={class:"flex flex-col md:flex-row md:justify-between items-center w-full","aria-label":"Table navigation"},k={class:"text-xs md:text-sm font-normal text-gray-500 dark:text-gray-400 mb-2 md:mb-0"},v={class:"font-semibold text-gray-900 dark:text-white"},w={class:"font-semibold text-gray-900 dark:text-white"},j={class:"inline-flex items-center flex-wrap -space-x-px"},L={__name:"ProductsPagination",props:{pagination:Object},setup(n){const h=n,u=x(()=>{const{links:t,current_page:r,last_page:a}=h.pagination.meta,e=[];return r>1&&e.push(t[0]),a>4?r<4?(e.push(...t.slice(1,4)),e.push({label:"...",url:"#"}),e.push(t[t.length-2])):r>a-3?(e.push(t[1]),e.push({label:"...",url:"#"}),e.push(...t.slice(-3))):(e.push(t[1]),e.push({label:"...",url:"#"}),e.push(...t.slice(r-2,r+1)),e.push({label:"...",url:"#"}),e.push(t[t.length-2])):e.push(...t.slice(1,-1)),r<a&&e.push(t[t.length-1]),e});return(t,r)=>(s(),o("nav",_,[l("span",k,[i(" Page "),l("span",v,c(n.pagination.meta.current_page),1),i(" of "),l("span",w,c(n.pagination.meta.last_page),1)]),l("ul",j,[(s(!0),o(m,null,b(u.value,a=>(s(),o("li",{key:a.label},[a.label==="..."?(s(),d(g(p),{key:0,href:"#",class:"flex items-center justify-center text-xs md:text-sm py-1 md:py-2 px-2 md:px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"},{default:f(()=>[i(" ... ")]),_:1})):(s(),d(g(p),{key:1,"preserve-scroll":"",href:a.url??"#",innerHTML:a.label,class:y(["flex items-center justify-center text-xs md:text-sm py-1 md:py-2 px-2 md:px-3 leading-tight border border-gray-300 dark:border-gray-700 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white",{"bg-[#7d836d]":a.active,"!text-gray-300":!a.url}])},null,8,["href","innerHTML","class"]))]))),128))])]))}};export{L as default};
