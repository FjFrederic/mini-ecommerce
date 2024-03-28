import Axios from 'axios';
import config from '../env';

import ProductApi from './ProductApi.js';
import OrderApi from './OrderApi';

export class Api {
  constructor () {
    const axiosInstance = Axios.create({
      baseURL: config.API
    });
  
    this.productApi = new ProductApi(axiosInstance);
    this.orderApi = new OrderApi(axiosInstance);
  }
};