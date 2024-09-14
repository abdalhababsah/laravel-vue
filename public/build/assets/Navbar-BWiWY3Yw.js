import{c as n,a as e,f as a,g as r,u as s,t as d,E as l,o as i,z as o,b as g}from"./app-CRDXSECe.js";const c={class:"bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50"},h={class:"flex flex-wrap justify-between items-center"},u={class:"flex justify-start items-center"},p=l('<button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation" class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg><svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg><span class="sr-only">Toggle sidebar</span></button>',1),y=e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"size-6",color:"#7d836d"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"})],-1),w=e("span",{class:"self-center text-2xl font-semibold whitespace-nowrap text-[#7d836d] dark:text-white ml-4"},"Shantaty",-1),x={class:"flex items-center lg:order-2"},v=l('<div class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"><span class="sr-only">notifications</span><svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg></div><button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown"><span class="sr-only">Open user menu</span><img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" alt="user photo"></button>',2),f={class:"hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600",id:"dropdown"},m={class:"py-3 px-4"},b={class:"block text-sm font-semibold text-gray-900 dark:text-white"},k={class:"block text-sm text-gray-900 truncate dark:text-white"},_={class:"py-1 text-gray-700 dark:text-gray-300","aria-labelledby":"dropdown"},z=e("li",null,[e("a",{href:"#",class:"block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"},"My profile")],-1),M={class:"py-1 text-gray-700 dark:text-gray-300","aria-labelledby":"dropdown"},B=e("svg",{"aria-hidden":"true",class:"mr-2 w-5 h-5 text-gray-400",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"})],-1),V=e("span",{class:"flex items-center"}," Logout ",-1),C=e("ul",{class:"py-1 text-gray-700 dark:text-gray-300","aria-labelledby":"dropdown"},[e("li")],-1),N={__name:"Navbar",setup(L){return(t,j)=>(i(),n("nav",c,[e("div",h,[e("div",u,[p,a(s(o),{href:t.route("admin.dashboard"),class:"flex items-center justify-between mr-4"},{default:r(()=>[y,w]),_:1},8,["href"])]),e("div",x,[v,e("div",f,[e("div",m,[e("span",b,d(t.$page.props.auth.user.name),1),e("span",k,d(t.$page.props.auth.user.email),1)]),e("ul",_,[z,e("li",null,[a(s(o),{href:t.route("user.profile"),class:"block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"},{default:r(()=>[g("Account settings ")]),_:1},8,["href"])])]),e("ul",M,[e("li",null,[a(s(o),{href:t.route("logout"),method:"post",class:"flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"},{default:r(()=>[B,V]),_:1},8,["href"])])]),C])])])]))}};export{N as default};
