export default class ProductApi {

  constructor (axiosInstance) {
    this.requester = axiosInstance;
  }

  /**
   * @returns {*}
  */
  fetchFromApi() {
    const url = '/api/product';
    return this.requester.get(url);
  }
};
