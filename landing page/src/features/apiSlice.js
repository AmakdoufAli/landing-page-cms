import { createApi, fetchBaseQuery } from "@reduxjs/toolkit/query/react";

const BASEURL = process.env.REACT_APP_API_URL;

export const ainfluenceApi = createApi({
  reducerPath: "ainfluenceApi",
  baseQuery: fetchBaseQuery({ baseUrl: BASEURL }),
  endpoints: (builder) => ({
    getLandingPages: builder.query({
      query: () => "/landing-pages",
    }),
    getSections: builder.query({
      query: (landing_page_id) => `/sections/lp/${landing_page_id}`,
    }),
    getCards: builder.query({
      query: (section_id) => `/cards/section/${section_id}`,
    }),
    postContactNotification: builder.mutation({
      query: (body) => ({
        url: '/contact',
        method: 'POST',
        body,
      }),
    }),    
  }),
});

export const {
  useGetLandingPagesQuery,
  useGetSectionsQuery,
  useGetCardsQuery,
  usePostContactNotificationMutation
} = ainfluenceApi;