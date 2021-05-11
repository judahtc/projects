import { Component, OnInit } from '@angular/core';
import { DataService } from '../data.service'
@Component({
  selector: 'app-view',
  templateUrl: './view.component.html',
  styleUrls: ['./view.component.css']
})
export class ViewComponent implements OnInit {

  constructor(private dataService:DataService) { }
  sales:any;
  ngOnInit(): void {

    this.dataService.getData() 
    .subscribe((sales)=>{
      this.sales=sales
      console.log(this.sales)
    })
  }

 
}
