import{j as S}from"./jquery-duOnZAWn.js";window.$=S;document.addEventListener("DOMContentLoaded",function(){const a=document.querySelectorAll(".show-user-details"),i=document.querySelector("#nombre"),s=document.querySelector("#apePaterno"),d=document.querySelector("#apeMaterno"),u=document.querySelector("#email"),m=document.querySelector("#celular"),p=document.querySelector("#fechaNac"),v=document.querySelector("#ci");document.querySelector("#rol");const y=document.querySelector("#add-role-btn"),n=document.querySelector("#roles-container");function l(o,e){const t=document.getElementById(e==="edit"?"form-admin":"form-admin-crear"),r=document.getElementById(e==="edit"?"form-comunario":"form-comunario-crear"),c=document.getElementById(e==="edit"?"form-delivery":"form-delivery-crear");t.style.display="none",r.style.display="none",c.style.display="none",o==1?t.style.display="block":o==3?r.style.display="block":o==4&&(c.style.display="block")}function f(o){n.innerHTML="",o.forEach(e=>{const t=document.createElement("div");t.classList.add("row","mb-3"),t.innerHTML=`
                <label for="rol" class="col-md-4 col-form-label text-md-end">Rol</label>
                <div class="col-md-6">
                    <select class="form-select" name="roles[]">
                        <option value="1" ${e==1?"selected":""}>Administrador</option>
                        <option value="2" ${e==2?"selected":""}>Usuario</option>
                        <option value="3" ${e==3?"selected":""}>Comunario</option>
                        <option value="4" ${e==4?"selected":""}>Delivery</option>
                    </select>
                </div>
            `,n.appendChild(t)})}a.forEach(o=>{o.addEventListener("click",function(){const e=JSON.parse(this.dataset.user);i.value=e.nombre||"",s.value=e.apePaterno||"",d.value=e.apeMaterno||"",u.value=e.email||"",m.value=e.celular||"",p.value=e.fechaNac||"",v.value=e.ci||"",f(e.roles),l(e.roles[0],"edit")})}),y.addEventListener("click",function(){const o=document.createElement("div");o.classList.add("row","mb-3"),o.innerHTML=`
            <label for="rol" class="col-md-4 col-form-label text-md-end">Rol adicional</label>
            <div class="col-md-6">
                <select class="form-select" name="roles[]">
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                    <option value="3">Comunario</option>
                    <option value="4">Delivery</option>
                </select>
            </div>
        `,n.appendChild(o)}),document.querySelector("#rol-crear").addEventListener("change",function(){l(this.value,"crear")}),document.querySelector("#rol").addEventListener("change",function(){l(this.value,"edit")})});
