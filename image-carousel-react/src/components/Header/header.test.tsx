import { render, screen } from "@testing-library/react";
import React from "react";
import Header from "./header";

describe("Header", () => {
  it("should render", () => {
    render(<Header />);
    expect(screen.getByTestId("header")).toMatchSnapshot();
  });
});
