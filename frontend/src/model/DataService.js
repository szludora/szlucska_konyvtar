import axios from "axios";

export default class DataService {
  constructor() {
    axios.defaults.baseURL = "http://127.0.0.1:8000/api";
  }
  getData(vegpont, callback) {
    axios
      .get(vegpont)
      .then(function (response) {
        callback(response.data);
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {});
  }

  postData(data, vegpont, callback) {
    axios
      .post(vegpont, data)
      .then(function (response) {
        callback(response.data);
        console.log("sikeres");
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {});
  }

  deleteData(vegpont, id) {
    axios
      .delete(vegpont + "/" + id)
      .then(function (response) {
        console.log("DS: törölve", response.data);
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {});
  }
}
