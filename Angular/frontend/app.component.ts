import { Component } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ModalDismissReasons } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],

})
export class AppComponent {
  title = 'Frontend';
  body:string= 'ADD SOME CONTENT'
  form :FormGroup;
}
