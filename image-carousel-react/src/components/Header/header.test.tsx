import {render, screen} from "@testing-library/react";
import Header from "./header";
import React from 'react';

describe("Header", () => {
    it("should render", () => {
        render(<Header/>)
        expect(screen.getByTestId('header')).toMatchSnapshot()
    });
})
