import { render, fireEvent, screen } from "@testing-library/react";
import renderer from "react-test-renderer";
import { describe } from "node:test";
import SinglePageHeader from "../Components/SinglePageHeader";
describe('SinglePageHeader', () =>{
  it('should have title', ()=>{
    render(<SinglePageHeader title="test title"/>)

  })
})

// test('it works', () => {
//   expect(1 + 2).toBe(3)
// })