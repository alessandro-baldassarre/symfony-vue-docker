import axios from "axios";

const baseUrl = "/api";

class HttpClient {
  constructor(context) {
    this.context = context;

    axios.interceptors.request.use((config) => {
      config.headers["Content-Type"] = "application/json";
      return config;
    });
  }

  get(url, options) {
    return axios.get(`${url}`, options);
  }
  post(url, data) {
    return axios.post(`${baseUrl}${url}`, data);
  }
  put(url, data) {
    return axios.put(`${baseUrl}${url}`, data);
  }
}

export default HttpClient;
