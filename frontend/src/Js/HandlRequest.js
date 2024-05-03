import axios from 'axios';


const baseUrl = process.env.REACT_APP_API_URL;

const axiosInstance = axios.create({
  baseURL: baseUrl,
});

axiosInstance.interceptors.response.use(
  (response) => response,
  async (error) => {
    if (error.response && error.response.status === 401) {
      try {
        const refreshedTokenResponse = await axios.post(baseUrl);

        const newAccessToken = refreshedTokenResponse.data.access_token;
        axiosInstance.defaults.headers.common['Authorization'] = `Bearer ${newAccessToken}`;

        return axiosInstance(error.config);
      } catch (refreshError) {
        console.error('Error refreshing token:', refreshError);
      }
    }
    return Promise.reject(error);
  }
);

export default axiosInstance;
