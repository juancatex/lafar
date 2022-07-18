
import { Component, OnInit } from '@angular/core';
import { ProvedoresService } from "../provedores.service"
import { Pro } from "../pro"
import { MatDialog } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
@Component({
  selector: 'app-listar',
  templateUrl: './listar.component.html',
  styleUrls: ['./listar.component.css']
})
export class ListarProComponent implements OnInit {
   provers: Pro[]=[];

  constructor(private proserv: ProvedoresService, private dialogo: MatDialog, private snackBar: MatSnackBar) { }



  ngOnInit() {
    this.obtenerProveedores();
  }

  obtenerProveedores() {

    return this.proserv
      .getProvedores()
      .subscribe((prot:Pro[]) => this.setdata(prot));
  }

  setdata(data:Pro[]){
    this.provers = data;
  }

}
