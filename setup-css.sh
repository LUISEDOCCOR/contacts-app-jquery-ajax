#!/bin/bash
touch public/css/output.css
pnpm i
pnpm run build:css
