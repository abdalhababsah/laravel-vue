import{Q as u,y as v,k as w,c as o,a as t,f as i,g as s,u as e,n as f,x as h,i as p,o as r,z as d,a3 as _,b as n,t as y}from"./app-CRDXSECe.js";const k={class:"max-w-screen-xl mx-auto flex items-center justify-between p-4"},C=t("span",{class:"px-4 py-2 rounded-md self-center text-3xl font-semibold text-[#7d836d] whitespace-nowrap dark:text-white hover:-translate-y-1 transform transition duration-200 hover:shadow-md"},[n(" Shantaty."),t("span",null,"net")],-1),L={class:"flex flex-col space-y-4 p-4"},D=t("li",null,[t("a",{href:"#",class:"block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},"About")],-1),z=t("li",null,[t("a",{href:"#",class:"block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},"Contact")],-1),A={key:0},B={key:1},N={class:"absolute top-3 right-0 left-9 inline-flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 border-2 border-white rounded-full transform translate-x-2 -translate-y-2 dark:border-gray-900"},R=t("p",null,"Cart",-1),S={key:2,class:"flex gap-2"},V={key:0,href:"admin/dashboard",class:"px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white"},j={key:1,class:"px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white",href:"user/dashboard"},H={key:3,class:"flex gap-2"},E={class:"hidden md:flex md:items-center md:space-x-8 rtl:space-x-reverse font-medium w-full md:w-auto"},M={class:"flex flex-col md:flex-row md:space-x-8 mt-4 md:mt-0"},O=t("li",null,[t("a",{href:"#",class:"block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},"About")],-1),Q=t("li",null,[t("a",{href:"#",class:"block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},"Contact")],-1),T={key:0},$={key:1},q={class:"absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 border-2 border-white rounded-full transform translate-x-2 -translate-y-2 dark:border-gray-900"},F=t("p",null,"Cart",-1),G={key:0,class:"hidden md:flex items-center space-x-3 rtl:space-x-reverse"},I={key:0,class:"flex gap-2"},J={key:0,href:"admin/dashboard",class:"px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white"},K={key:1,class:"px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white",href:"user/dashboard"},P={key:1,class:"flex gap-2"},Y={__name:"Header",setup(U){const b=u().props.canLogin,g=u().props.canRegister,c=u().props.auth,x=v(()=>u().props.cart),l=w(!1);return(a,m)=>(r(),o("nav",{class:f({"bg-white w-full":l.value,"dark:bg-gray-800":!l.value,"border-gray-200":!0,"z-50":!0,relative:!0})},[t("div",k,[i(e(d),{href:a.route("user.home"),class:"hidden md:flex items-center space-x-3 rtl:space-x-reverse"},{default:s(()=>[C]),_:1},8,["href"]),t("button",{onClick:m[0]||(m[0]=W=>l.value=!l.value),class:"md:hidden text-gray-900 dark:text-white focus:outline-none"},[i(e(_),{class:"h-8 w-8 text-[#7d836d]"})]),t("div",{class:f([{block:l.value,hidden:!l.value},"fixed inset-0 top-16 md:hidden bg-white dark:bg-gray-800 z-40"])},[t("ul",L,[t("li",null,[i(e(d),{href:a.route("user.home"),class:"block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:s(()=>[n("Home")]),_:1},8,["href"])]),D,z,e(b)?(r(),o("li",A,[i(e(d),{href:a.route("products.index"),class:"block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:s(()=>[n("Shop")]),_:1},8,["href"])])):h("",!0),e(b)?(r(),o("li",B,[i(e(d),{href:a.route("cart.view"),class:"relative block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:s(()=>[t("div",N,y(x.value.data.count),1),R]),_:1},8,["href"])])):h("",!0),e(c).user?(r(),o("li",S,[e(c).user.isAdmin?(r(),o("a",V," Dashboard ")):(r(),o("a",j," Dashboard ")),i(e(d),{href:a.route("logout"),method:"post",class:"px-6 py-3 mb-4 md:bg-[#7d836d] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white"},{default:s(()=>[n(" Logout ")]),_:1},8,["href"])])):(r(),o("li",H,[i(e(d),{href:a.route("login"),type:"button",class:"px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white"},{default:s(()=>[n(" Login ")]),_:1},8,["href"]),e(g)?(r(),p(e(d),{key:0,href:a.route("register"),type:"button",class:"px-6 py-3 mb-4 md:bg-[#7d836d] md:text-white mr-3 bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white"},{default:s(()=>[n(" Register ")]),_:1},8,["href"])):h("",!0)]))])],2),t("div",E,[t("ul",M,[O,Q,e(b)?(r(),o("li",T,[i(e(d),{href:a.route("products.index"),class:"block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:s(()=>[n("Shop")]),_:1},8,["href"])])):h("",!0),e(b)?(r(),o("li",$,[i(e(d),{href:a.route("cart.view"),class:"relative block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:s(()=>[t("div",q,y(x.value.data.count),1),F]),_:1},8,["href"])])):h("",!0)])]),e(b)?(r(),o("div",G,[e(c).user?(r(),o("div",I,[e(c).user.isAdmin?(r(),o("a",J," Dashboard ")):(r(),o("a",K," Dashboard ")),i(e(d),{href:a.route("logout"),method:"post",class:"px-6 py-3 mb-4 md:bg-[#7d836d] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white"},{default:s(()=>[n(" Logout ")]),_:1},8,["href"])])):(r(),o("div",P,[i(e(d),{href:a.route("login"),type:"button",class:"px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white"},{default:s(()=>[n(" Login ")]),_:1},8,["href"]),e(g)?(r(),p(e(d),{key:0,href:a.route("register"),type:"button",class:"px-6 py-3 mb-4 md:bg-[#7d836d] md:text-white mr-3 bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white"},{default:s(()=>[n(" Register ")]),_:1},8,["href"])):h("",!0)]))])):h("",!0)])],2))}};export{Y as default};
