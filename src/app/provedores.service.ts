import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Pro } from "./pro"
import { environment } from "../environments/environment"
@Injectable({
  providedIn: 'root'
})
export class ProvedoresService {
  baseUrl = environment.baseUrl

  constructor(private http: HttpClient) { }

  getProvedores() {
    return this.http.get(`${this.baseUrl}/getAll.php`);
  }

  getProv(id: string | number) {
    return this.http.get(`${this.baseUrl}/get.php?id=${id}`);
  }

  addPro(pro: Pro) {
    return this.http.post(`${this.baseUrl}/post.php`, pro);
  }

  deletePro(pro: Pro) {
    return this.http.delete(`${this.baseUrl}/delete.php?id=${pro.id}`);
  }

  updatePro(pro: Pro) {
    return this.http.put(`${this.baseUrl}/update.php`, pro);
  }
}