var hours = 0; 
var empNumber = 0;
var overtime = 40;               
var salary = 0;                         
var totalSalary = 0;
var wage = 15;   
var payrollTable= "";        

while (hours >=0){
    hours = parseInt(window.prompt("How many hours did Employee " + (empNumber+1) + " work?\n" + "Enter '-1' to exit."));
    if(hours<0){
        break;
    }
    empNumber += 1;	
    if (hours > overtime) 
        salary = (overtime * wage) + 1.5 * (hours - overtime) * wage;
    else
        salary = wage * hours;

    payrollTable= payrollTable.concat("<tr><td>" + empNumber + "</td><td>" + hours + "</td><td> $" + salary + "</td></tr>");
    totalSalary += salary;
}

document.getElementById("payroll").innerHTML = payrollTable;
document.getElementById("total").innerHTML = "<p> The total pay of all the employees is $" + totalSalary + "." + " </p> ";

function reloadPage(){
    location.reload();
}