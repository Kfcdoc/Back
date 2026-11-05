import { ComponentFixture, TestBed } from '@angular/core/testing';
import { LibroCrud } from './libro-crud';

describe('LibroCrud', () => {
  let component: LibroCrud;
  let fixture: ComponentFixture<LibroCrud>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [LibroCrud],
    }).compileComponents();

    fixture = TestBed.createComponent(LibroCrud);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
