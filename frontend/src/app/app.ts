import { Component, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { LibroCrudComponent } from './components/libro-crud/libro-crud';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, LibroCrudComponent],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App {
  protected readonly title = signal('mi-app-angular');
}