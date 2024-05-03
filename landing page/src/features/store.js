import { configureStore } from '@reduxjs/toolkit';
import { ainfluenceApi } from './apiSlice';

export const store = configureStore({
  reducer: {
    [ainfluenceApi.reducerPath]: ainfluenceApi.reducer,
  },
  middleware: (getDefaultMiddleware) =>
    getDefaultMiddleware().concat(ainfluenceApi.middleware),
});