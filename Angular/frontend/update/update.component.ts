import { analyzeAndValidateNgModules } from '@angular/compiler';
import { importType } from '@angular/compiler/src/output/output_ast';
import { Component, OnInit } from '@angular/core';
import { DataService }  from '../data.service'
import {  FormGroup,ReactiveFormsModule,FormBuilder, FormControl} from '@angular/forms'
import { ActivatedRoute,Router } from '@angular/router'
@Component({
  selector: 'app-update',
  templateUrl: './update.component.html',
  styleUrls: ['./update.component.css']
})
export class UpdateComponent implements OnInit {
users:any;
data:any;
id:any;
form:FormGroup;

  constructor( private dataService:DataService,
                private fb:FormBuilder,
                private route:ActivatedRoute,
                private router:Router
    ) { }

  ngOnInit(): void {
    
    this.form=this.fb.group({
      name:[''],
      email :[''],
      password:[''],
  
    });

    this.dataService.getUserById(this.route.snapshot.params.id)
    .subscribe(user=>{
     this.form= new FormGroup({
       name : new FormControl(user['name']),
       email : new FormControl(user['email']),
       password : new FormControl(user['password']),
     
           })

  });
 
 
  }
 
  update(){
    this.id=this.route.snapshot.params.id
    this.data=this.form.value
    this.dataService.update(this.id,this.data)
    .subscribe((res)=>{
     return this.router.navigate(['/users'])
    })
  }

}

