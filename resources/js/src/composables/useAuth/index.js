import { inject } from "vue";
import api from "../../../config"
export default function useAuth()
{

     function setAuthToken(token)
     {
         window.localStorage.setItem('auth_token',token)
     }

     function removeAuthToken(token)
     {
         window.localStorage.removeItem('auth_token')
     }

     function login(data)
     {
        api.get('hello').then(e=>{

            console.log("okok");
        })
        .catch(e=>{
            console.log(e);
        })
     }

     return {login}
}
