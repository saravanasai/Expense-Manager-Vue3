import axios from "axios";

const token = localStorage.getItem('auth_token')
 const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api/',
    timeout: 1000,
    headers: {
        'Accept': 'application/json',
        'Authorization': `Bearer ${token}`
      }
  });

  export default api
