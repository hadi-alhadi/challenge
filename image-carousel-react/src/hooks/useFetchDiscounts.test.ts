import { renderHook, waitFor } from "@testing-library/react";
import useFetchDiscounts, { Discount } from "./useFetchDiscounts";

global.fetch = jest.fn();

describe("useFetchedData", () => {
  beforeEach(() => {
    jest.clearAllMocks();
  });

  it("should return the initial values for `data`, error and loading", async () => {
    const { result } = renderHook(() => useFetchDiscounts("", ""));
    const { data, error, loading } = result.current;

    // this being not wrapped in a waitFor causes the act errors in the console.
    expect(data).toStrictEqual([]);
    expect(error).toBe(null);
    expect(loading).toBe(true);
  });

  describe("when data is fetched successfully", () => {
    let mockedData: Discount[];

    beforeEach(() => {
      mockedData = [
        {
          id: 1,
          name: "name-here-1",
          image: "url/to/img",
          discount_percentage: 10,
        },
        {
          id: 2,
          name: "name-here-2",
          image: "url/to/img",
          discount_percentage: 20,
        },
      ];

      global.fetch = jest.fn().mockResolvedValue({
        json: jest.fn().mockResolvedValue(mockedData),
      });
    });

    it("should return data", async () => {
      const { result } = renderHook(() => useFetchDiscounts("", ""));

      await waitFor(() =>
        expect(result.current).toEqual({
          data: mockedData,
          error: null,
          loading: false,
        }),
      );
    });
  });

  describe("when data is not fetched successfully", () => {
    const mockedError = new Error("mocked error");

    beforeEach(() => {
      global.fetch = jest.fn().mockRejectedValue(mockedError);
    });

    it("should return the Error", async () => {
      const { result } = renderHook(() => useFetchDiscounts("", ""));

      await waitFor(() => {
        const { error } = result.current;
        expect(error).toBe("mocked error");
      });
    });
  });
});
