import{T as l,i as m,g as t,o as d,f as o,u as a,Z as c,a as e,b as p,n as u,w as f}from"./app-C5mQx9UN.js";import{_}from"./GuestLayout-DgraYXVp.js";import{_ as w,a as b,b as g}from"./TextInput-Cv2kdp_H.js";import{P as x}from"./PrimaryButton-CdXjbcj8.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const h=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),y={class:"flex justify-end mt-4"},N={__name:"ConfirmPassword",setup(P){const s=l({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>s.reset()})};return(V,r)=>(d(),m(_,null,{default:t(()=>[o(a(c),{title:"Confirm Password"}),h,e("form",{onSubmit:f(i,["prevent"])},[e("div",null,[o(w,{for:"password",value:"Password"}),o(b,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:a(s).password,"onUpdate:modelValue":r[0]||(r[0]=n=>a(s).password=n),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),o(g,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),e("div",y,[o(x,{class:u(["ms-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:t(()=>[p(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{N as default};
