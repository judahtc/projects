import { Component, OnInit } from '@angular/core';
import { updateDecorator } from 'typescript';
import {  DataService } from '../data.service'
@Component({
  selector: 'app-portal',
  templateUrl: './portal.component.html',
  styleUrls: ['./portal.component.css']
})
export class PortalComponent implements OnInit {
user:any;
  constructor(private dataService:DataService) { }

  ngOnInit(): void {
    this.all()
  }
  all(){
    this.dataService.portal()
    .subscribe(user=>{
        this.user=user
        console.log(user)
    });
  }

  

}
