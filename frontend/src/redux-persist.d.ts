// src/redux-persist.d.ts
declare module "redux-persist/lib/storage" {
  const storage: Storage; // Storage インターフェースに準拠
  export default storage;
}
