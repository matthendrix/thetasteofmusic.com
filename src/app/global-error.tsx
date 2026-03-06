"use client";

type GlobalErrorProps = {
  error: Error & { digest?: string };
  reset: () => void;
};

export default function GlobalError({ error, reset }: GlobalErrorProps) {
  return (
    <html lang="en">
      <body style={{ margin: 0, padding: "2rem", color: "#fff", background: "#000" }}>
        <h1>Application error</h1>
        <p>{error.message}</p>
        <button type="button" onClick={reset}>
          Reload
        </button>
      </body>
    </html>
  );
}
