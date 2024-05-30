import axios from 'axios';

export const api = axios.create({
  baseURL: '/api/',
  headers: { 'Content-Type': 'application/json' },
});

api.interceptors.response.use(
  (response) => response,
  (error) => Promise.resolve(error?.response ?? error),
);

export default api;
