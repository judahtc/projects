    import { Injectable } from '@angular/core';
    import { HttpClient, HttpHeaders } from '@angular/common/http'
    import { getLocaleDateFormat } from '@angular/common';
    @Injectable({
      providedIn: 'root'
    })
    export class DataService {

      constructor(private http:HttpClient) { }
      URL="http://127.0.0.1:8000/sales";
      URL1="http://127.0.0.1:8000";
      URL2="http://127.0.0.1:8000/JulohUpdate/";
      URL3="http://127.0.0.1:8000/JulohUpdate/";
      URL4="http://127.0.0.1:8000/JulohUpdate/";
      URL5="http://127.0.0.1:8000/login";
      URL6="http://127.0.0.1:8000/portal";
    getData(){
      return this.http.get(this.URL)
    }
    ///GET
    getUsers(){
      return this.http.get(this.URL1)
    }
    ///POST
    upload(data:any) {
      return this.http.post<any>(this.URL1, data);
    }
    ///GetById
    getUserById(id){
      return this.http.get(this.URL2 + id,
        { headers: new HttpHeaders({ 'Content-Type': 'application/json', 'Authorization': 'Bearer ' + String(localStorage.getItem("token")) }) })
    }
    ///DELETE
    public deleteuser(id:any)
      {
        return this.http.delete(this.URL3 + id)
    }
    ///PUT
    update(id,data){
      return this.http.put(this.URL4 + id,data)
    }


      login(data:any){
          return this.http.post<any>(this.URL5, data);
      }

    portal(){
      return this.http.get(this.URL6)
    }



    }