
import api from "../../../config"
export default function useAuth()
{

     function setAuthToken(token)
     {
         window.localStorage.setItem('auth_token',token)
     }

     function isAuthenticated()
     {
         return window.localStorage.getItem('auth_token') ? true : false;
     }

     function removeAuthToken()
     {
         window.localStorage.removeItem('auth_token')
     }

     function login(data)
     {
        return api.post('user-registeration',data)
     }

     function logout()
     {
        return api.post('/user/user-logout')
     }

     return {login,setAuthToken,logout,removeAuthToken,isAuthenticated}
}
