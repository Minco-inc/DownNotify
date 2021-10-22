class A {
	seta(e) { this.a = e; }
	print() { console.log(this.a); }
}

let ac = new A();
let a = 1;
ac.seta(a);
a = 2;
ac.print();
