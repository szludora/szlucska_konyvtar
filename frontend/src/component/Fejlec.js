export default function Fejlec(props) {
  return props.lista.map((e, i) => {
    return <th key={i}>{e}</th>;
  });
}
