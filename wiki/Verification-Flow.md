# Verification Flow

## Evidence First

VSE is designed so that proof creation begins with captured machine evidence, not with a human claim.

```text
SOURCE RESPONSE
      ↓
RAW EVIDENCE
      ↓
HASH
      ↓
SOURCE VALIDATION
      ↓
TIME / INTERVAL VALIDATION
      ↓
DUPLICATE CHECK
      ↓
ENERGY CALCULATION
      ↓
AUDIT EVENT
      ↓
VSE UNIT
      ↓
MINT
      ↓
RETIREMENT
      ↓
FINAL PROOF
```

## Validation Areas

- source identity;
- plant, inverter, logger and meter identifiers;
- timestamps and interval ordering;
- missing or invalid samples;
- excessive gaps;
- future timestamps;
- source integrity;
- duplicate evidence;
- previously processed intervals;
- methodology version;
- previous audit state.

## Deterministic Rule

> **The same valid evidence under the same methodology and protocol version should produce the same verification result.**

## Failure Rule

```text
IF VALIDATION PASSES
    → CONTINUE

IF VALIDATION FAILS
    → REJECT
```

No human approval may convert mathematically failed evidence into valid energy.

[← Wiki Home](Home.md)