import{Q as p,T as v,c as i,a as l,f as a,u as s,d as x,e as V,g as m,X as g,w as _,o as c,b,x as k}from"./app-C5mQx9UN.js";import{a as u,b as r,_ as n}from"./TextInput-Cv2kdp_H.js";import{P as w}from"./PrimaryButton-CdXjbcj8.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const U=l("header",null,[l("h2",{class:"text-lg font-medium text-gray-900"},"Address Information"),l("p",{class:"mt-1 text-sm text-gray-600"},"Update your account's address information.")],-1),M={class:"flex items-center"},z=l("span",{class:"ml-2 text-sm text-gray-600"},"Set as Main Address",-1),A={class:"flex items-center gap-4"},C={key:0,class:"text-sm text-gray-600"},$={__name:"UpdateAddressForm",props:{address:Array},setup(f){const t=f;p().props.auth.user;const e=v({address1:(t==null?void 0:t.address.address1)||"",address2:(t==null?void 0:t.address.address2)||"",city:(t==null?void 0:t.address.city)||"",state:(t==null?void 0:t.address.state)||"",zipcode:(t==null?void 0:t.address.zipcode)||"",country_code:(t==null?void 0:t.address.country_code)||"",isMain:(t==null?void 0:t.address.isMain)||!1}),y=()=>{e.patch(route("address.update"))};return(S,d)=>(c(),i("section",null,[U,l("form",{onSubmit:_(y,["prevent"]),class:"mt-6 space-y-6"},[l("div",null,[a(n,{for:"address1",value:"Address Line 1"}),a(u,{id:"address1",type:"text",class:"mt-1 block w-full",modelValue:s(e).address1,"onUpdate:modelValue":d[0]||(d[0]=o=>s(e).address1=o),required:"",autofocus:"",autocomplete:"address-line1"},null,8,["modelValue"]),a(r,{class:"mt-2",message:s(e).errors.address1},null,8,["message"])]),l("div",null,[a(n,{for:"address2",value:"Address Line 2"}),a(u,{id:"address2",type:"text",class:"mt-1 block w-full",modelValue:s(e).address2,"onUpdate:modelValue":d[1]||(d[1]=o=>s(e).address2=o),autocomplete:"address-line2"},null,8,["modelValue"]),a(r,{class:"mt-2",message:s(e).errors.address2},null,8,["message"])]),l("div",null,[a(n,{for:"city",value:"City"}),a(u,{id:"city",type:"text",class:"mt-1 block w-full",modelValue:s(e).city,"onUpdate:modelValue":d[2]||(d[2]=o=>s(e).city=o),required:"",autocomplete:"address-level2"},null,8,["modelValue"]),a(r,{class:"mt-2",message:s(e).errors.city},null,8,["message"])]),l("div",null,[a(n,{for:"state",value:"State"}),a(u,{id:"state",type:"text",class:"mt-1 block w-full",modelValue:s(e).state,"onUpdate:modelValue":d[3]||(d[3]=o=>s(e).state=o),autocomplete:"address-level1"},null,8,["modelValue"]),a(r,{class:"mt-2",message:s(e).errors.state},null,8,["message"])]),l("div",null,[a(n,{for:"zipcode",value:"Zip Code"}),a(u,{id:"zipcode",type:"text",class:"mt-1 block w-full",modelValue:s(e).zipcode,"onUpdate:modelValue":d[4]||(d[4]=o=>s(e).zipcode=o),required:"",autocomplete:"postal-code"},null,8,["modelValue"]),a(r,{class:"mt-2",message:s(e).errors.zipcode},null,8,["message"])]),l("div",null,[a(n,{for:"country_code",value:"Country Code"}),a(u,{id:"country_code",type:"text",class:"mt-1 block w-full",modelValue:s(e).country_code,"onUpdate:modelValue":d[5]||(d[5]=o=>s(e).country_code=o),required:"",autocomplete:"country"},null,8,["modelValue"]),a(r,{class:"mt-2",message:s(e).errors.country_code},null,8,["message"])]),l("div",null,[l("label",M,[x(l("input",{type:"checkbox","onUpdate:modelValue":d[6]||(d[6]=o=>s(e).isMain=o),class:"form-checkbox"},null,512),[[V,s(e).isMain]]),z]),a(r,{class:"mt-2",message:s(e).errors.isMain},null,8,["message"])]),l("div",A,[a(w,{disabled:s(e).processing},{default:m(()=>[b("Save")]),_:1},8,["disabled"]),a(g,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:m(()=>[s(e).recentlySuccessful?(c(),i("p",C,"Saved.")):k("",!0)]),_:1})])],32)]))}};export{$ as default};
