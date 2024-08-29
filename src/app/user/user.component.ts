import { Component, signal, computed } from '@angular/core';
import { DUMMY_USERS } from '../dummy-users';



@Component({
  selector: 'app-user',
  standalone: true,
  imports: [],
  templateUrl: './user.component.html',
  styleUrl: './user.component.css'
})
export class UserComponent {

  randomIndex() {    
    return Math.floor(Math.random() * DUMMY_USERS.length);
  }

  selectedUser = signal(DUMMY_USERS[this.randomIndex()]);
  imagePath = computed(() => 'assets/' + this.selectedUser().avatar);

  // get imagePath() { 
  //   return 'assets/' + this.selectedUser.avatar
  // }

  onSelectUser() {
    this.selectedUser.set(DUMMY_USERS[this.randomIndex()]);
  }

}
