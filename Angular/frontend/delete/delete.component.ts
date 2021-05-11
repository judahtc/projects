import { Component, OnInit } from '@angular/core';
import { DataService }  from '../data.service'
import { ActivatedRoute,Router } from '@angular/router'

@Component({
  selector: 'app-delete',
  templateUrl: './delete.component.html',
  styleUrls: ['./delete.component.css']
})
export class DeleteComponent implements OnInit {

  constructor( private dataService:DataService,
              private route:ActivatedRoute,
              private router:Router
    ) { }

  ngOnInit(): void {

    this.dataService.deleteuser(this.route.snapshot.params.id).subscribe(res=>{
      return this.router.navigate(['/users']);
    });
  }

}
