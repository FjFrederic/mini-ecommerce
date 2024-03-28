export default class OrderApi {

  constructor (axiosInstance) {
    this.requester = axiosInstance;
  }

  /**
   * @returns {*}
  */
  saveOrder(params) {
    const url = '/api/order/add';
    return this.requester.post(url, params);
  }
};
